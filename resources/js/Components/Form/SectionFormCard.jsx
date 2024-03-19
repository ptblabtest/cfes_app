import React, { useEffect, useState } from "react";
import axios from "axios";
import InputRenderer from "@/Components/Render/InputRenderer";
import { SubmitButton } from "@/Components/Button/SubmitButton";
import ConfirmationModal from "@/Components/Modal/ConfirmationModal";

const SectionFormCard = ({ item, entity, sections }) => {
    const isEditMode = item && item.id !== undefined;
    const apiUrlPrefix = '/api';
    const storeUrl = `${apiUrlPrefix}/${entity}`;
    const updateUrl = isEditMode ? `${apiUrlPrefix}/${entity}/update/${item.id}` : storeUrl;

    // Modified initializeFormData to incorporate URL parameters directly
    const initializeFormData = () => {
        const formData = {};
        const urlParams = new URLSearchParams(window.location.search); // Get URL parameters
        sections.forEach((section) => {
            Object.keys(section.fields).forEach((fieldName) => {
                // Prioritize URL parameter if available, otherwise fallback to item data or default to ""
                formData[fieldName] = urlParams.get(fieldName) !== null ? urlParams.get(fieldName) :
                                      item && item[fieldName] !== undefined ? item[fieldName] : "";
            });
        });
        return formData;
    };

    const [form, setForm] = useState({
        data: initializeFormData(),
        errors: {},
    });

    const handleInputChange = (e) => {
        const { name, value, type, files } = e.target;
        setForm((prevForm) => ({
            ...prevForm,
            data: {
                ...prevForm.data,
                [name]: type === "file" ? files[0] : value,
            },
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        let formData = new FormData();
        Object.keys(form.data).forEach((key) => {
            const value = form.data[key];
            formData.append(key, value instanceof File ? value : value);
        });

        // Include _method 'PATCH' in formData if in edit mode
        if (isEditMode) {
            formData.append('_method', 'PATCH');
        }

        try {
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            const response = await axios.post(isEditMode ? updateUrl : storeUrl, formData, config);
            console.log(response.data);
            window.history.back();
        } catch (error) {
            if (error.response && error.response.data.errors) {
                setForm(prevForm => ({ ...prevForm, errors: error.response.data.errors }));
            }
        }
    };

    const [showConfirmationModal, setShowConfirmationModal] = useState(false);

    return (
        <>
            {sections.map((section, index) => (
                <React.Fragment key={index}>
                    {section.titleform && (
                        <h2 className="text-base font-semibold leading-7 text-gray-900">
                            {section.titleform}
                        </h2>
                    )}
                    {section.subtitleform && (
                        <p className="mt-1 text-sm leading-6 text-gray-600">
                            {section.subtitleform
                                .split("\n")
                                .map((line, idx) => (
                                    <React.Fragment key={idx}>
                                        {line}
                                        <br />
                                    </React.Fragment>
                                ))}
                        </p>
                    )}
                    <hr className="my-1 border-gray-100 dark:border-gray-600" />
                    {Object.keys(section.fields).map((fieldName) => (
                        <div key={fieldName} className="mb-3">
                            <InputRenderer
                                name={fieldName}
                                fieldConfig={section.fields[fieldName]}
                                value={form.data[fieldName]}
                                onChange={handleInputChange}
                                item={item}
                            />
                            {form.errors[fieldName] && (
                                <p className="text-red-500 text-xs italic">
                                    {form.errors[fieldName]}
                                </p>
                            )}
                        </div>
                    ))}
                    <hr className="my-5 border-slate-500 dark:border-gray-600" />
                </React.Fragment>
            ))}
            <div className="flex items-center justify-between">
                <div className="flex-grow text-center">
                    <SubmitButton
                        onClick={() => setShowConfirmationModal(true)}
                        isEdit={isEditMode}
                    />
                </div>
            </div>
            <ConfirmationModal
                isOpen={showConfirmationModal}
                onConfirm={handleSubmit}
                onCancel={() => setShowConfirmationModal(false)}
                entity={entity}
                isEdit={isEditMode}
            />
        </>
    );
};

export default SectionFormCard;

import React, { useEffect, useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import InputRenderer from "@/Components/Render/InputRenderer";
import { SubmitButton } from "@/Components/Button/SubmitButton";
import ConfirmationModal from "@/Components/Modal/ConfirmationModal";

const SectionFormCard = ({ item, entity, sections, storeUrl, updateUrl }) => {
    const useFormHandler = () => {
        const initializeFormData = () => {
            const formData = {};
            sections.forEach(section => {
                Object.keys(section.fields).forEach(fieldName => {
                    formData[fieldName] = item && item[fieldName] != null ? item[fieldName] : "";

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
            setForm(prevForm => ({
                ...prevForm,
                data: {
                    ...prevForm.data,
                    [name]: type === 'file' ? files[0] : value
                }
            }));
        };

        const handleSubmit = (e) => {
            e.preventDefault();

            let formData = new FormData();
            Object.keys(form.data).forEach(key => {
                const value = form.data[key];
                formData.append(key, value instanceof File ? value : String(value));
            });

            if (item) {
                formData.append('_method', 'PUT');
            }

            Inertia.post(item ? updateUrl : storeUrl, formData, {
                onError: errors => setForm(prevForm => ({ ...prevForm, errors })),
                onSuccess: () => setForm(prevForm => ({ ...prevForm, errors: {} })),
            });
        };

        return { form, handleInputChange, handleSubmit };
    };

    const { form, handleInputChange, handleSubmit } = useFormHandler();
    const [showConfirmationModal, setShowConfirmationModal] = useState(false);


    useEffect(() => {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.forEach((value, key) => {
            if (form.data.hasOwnProperty(key)) {
                handleInputChange({
                    target: {
                        name: key,
                        value: value,
                        type: "text",
                    },
                });
            }
        });
    }, [form.data]);

    const isEditMode = item !== undefined;

    return (
        <>
            <div className="mx-auto py-2">
                <div className="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6">
                            {sections.map((section, index) => (
                                <React.Fragment key={index}>
                                    {section.titleform && (
                                        <h2 className="text-base font-semibold leading-7 text-gray-900">
                                            {section.titleform}
                                        </h2>
                                    )}
                                    {section.subtitleform && (
                                        <p className="mt-1 text-sm leading-6 text-gray-600">
                                            {section.subtitleform.split('\n').map((line, idx) => (
                                                <React.Fragment key={idx}>
                                                    {line}
                                                    <br />
                                                </React.Fragment>
                                            ))}
                                        </p>
                                    )}

                                    <hr className="my-4 border-gray-200 dark:border-gray-600" />
                                    {Object.keys(section.fields).map((fieldName) => (
                                        <div key={fieldName} className="mb-4">
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
                                    
                                </React.Fragment>
                            ))}
                            <SubmitButton
                                onClick={() => setShowConfirmationModal(true)}
                                isEdit={isEditMode}
                            />
                        </div>
                    </div>
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

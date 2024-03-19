import React, { useEffect, useState } from "react";
import InputRenderer from "@/Components/Render/InputRenderer";
import { SubmitButton } from "@/Components/Button/SubmitButton";
import ConfirmationModal from "@/Components/Modal/ConfirmationModal";

const FormCard = ({ item, entity, fields }) => {
    const isEditMode = item && item.id !== undefined;
    const apiUrlPrefix = '/api'; // Ensure to use the API prefix
    const storeUrl = `${apiUrlPrefix}/${entity}`;
    const updateUrl = isEditMode ? `${apiUrlPrefix}/${entity}/update/${item.id}` : storeUrl;

    const [form, setForm] = useState({
        data: Object.keys(fields).reduce((acc, fieldName) => {
            acc[fieldName] = item && item[fieldName] !== undefined ? item[fieldName] : "";
            return acc;
        }, {}),
        errors: {},
    });

    const handleInputChange = (e) => {
        const { name, value, type, files } = e.target;
        setForm(prevForm => ({
            ...prevForm,
            data: {
                ...prevForm.data,
                [name]: type === "file" ? files[0] : value,
            },
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
    
        let formData = new FormData();
        Object.keys(form.data).forEach(key => {
            // Ensure values are appended to formData
            formData.append(key, form.data[key]);
        });
    
        // Append _method 'PATCH' if in edit mode for method spoofing
        if (isEditMode) {
            formData.append('_method', 'PATCH');
        }
    
        const config = {
            headers: { 'Content-Type': 'multipart/form-data' }
        };
    
        // Use 'post' for Axios regardless of the mode due to FormData and method spoofing
        axios({
            method: 'post', // Use post for both creating and updating
            url: isEditMode ? updateUrl : storeUrl,
            data: formData,
            headers: config.headers
        })
        .then(response => {
            console.log(response.data);
            window.history.back(); // Or implement other success handling
        })
        .catch(error => {
            if (error.response && error.response.data.errors) {
                setForm(prevForm => ({
                    ...prevForm,
                    errors: error.response.data.errors
                }));
            }
        });
    };

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
    }, []);

    const [showConfirmationModal, setShowConfirmationModal] = useState(false);

    return (
        <>
            <h2 className="text-base font-semibold leading-7 text-gray-900">
                General Information
            </h2>
            <p className="mt-1 text-sm leading-6 text-gray-600">
                Isi form berikut dengan data yang benar.
            </p>
            <hr className="my-1 border-gray-200 dark:border-gray-600" />
            <form
                className="py-1"
                onSubmit={(e) => {
                    e.preventDefault();
                    setShowConfirmationModal(true);
                }}
                encType="multipart/form-data"
            >
                {Object.keys(fields).map((fieldName) => (
                    <div key={fieldName} className="mb-1">
                        <InputRenderer
                            name={fieldName}
                            fieldConfig={fields[fieldName]}
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
                <div className="flex items-center justify-between">
                    <div className="flex-grow text-right">
                        <SubmitButton
                            onClick={() => setShowConfirmationModal(true)}
                            isEdit={isEditMode}
                        />
                    </div>
                </div>
            </form>

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

export default FormCard;

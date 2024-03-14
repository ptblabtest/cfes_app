import React, { useEffect, useState } from "react";
import InputRenderer from "@/Components/Render/InputRenderer";
import { SubmitButton } from "@/Components/Button/SubmitButton";
import ConfirmationModal from "@/Components/Modal/ConfirmationModal";
import { Inertia } from "@inertiajs/inertia";

const FormCard = ({ item, entity, fields }) => {
    const storeUrl = `/${entity}`;
    const updateUrl = item ? `/${entity}/update/${item.id}` : "";

    const [form, setForm] = useState({
        data: Object.keys(fields).reduce((acc, fieldName) => {
            acc[fieldName] =
                item && item[fieldName] !== null ? item[fieldName] : "";
            return acc;
        }, {}),
        errors: {},
    });

    const [showConfirmationModal, setShowConfirmationModal] = useState(false);

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

    const handleSubmit = (e) => {
        e.preventDefault();
        let formData = new FormData();
        Object.keys(form.data).forEach((key) => {
            if (Array.isArray(form.data[key])) {
                form.data[key].forEach((value) =>
                    formData.append(`${key}[]`, value)
                );
            } else {
                formData.append(
                    key,
                    form.data[key] instanceof File
                        ? form.data[key]
                        : String(form.data[key])
                );
            }
        });
        if (item) {
            formData.append("_method", "PUT");
        }
        const url = item ? updateUrl : storeUrl;
        Inertia.post(url, formData, {
            onError: (errors) =>
                setForm((prevForm) => ({ ...prevForm, errors })),
            headers: { "Content-Type": "multipart/form-data" },
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

    const isEditMode = item !== undefined;

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

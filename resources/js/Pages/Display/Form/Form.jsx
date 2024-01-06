import React, { useEffect, useState } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";
import InputRenderer from "@/Components/Render/InputRenderer";
import { ConfirmationModal, SuccessModal } from "@/Components/Modal/Modal";
import useFormHandler from "@/Hooks/useFormHandler";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import { SubmitButton } from "@/Components/Button/SubmitButton";

const Form = ({ entity, item, fields, title }) => {
    const { auth, flash } = usePage().props;
    const [showConfirmationModal, setShowConfirmationModal] = useState(false);

    const { form, handleInputChange, handleSubmit } = useFormHandler(
        item,
        entity,
        fields
    );

    const onSubmitForm = (e) => {
        e.preventDefault();
        setShowConfirmationModal(true);
    };

        // Dynamically set fields from URL parameters
        useEffect(() => {
            const urlParams = new URLSearchParams(window.location.search);
    
            urlParams.forEach((value, key) => {
                if (form.data.hasOwnProperty(key)) {
                    handleInputChange({
                        target: {
                            name: key,
                            value: value,
                            type: 'text'  // Defaulting to text, adjust as needed
                        }
                    });
                }
            });
        }, []);

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />
            <HeaderTitle title={title} />
            <div className="mx-auto py-2">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6">
                            <form
                                className="py-1"
                                onSubmit={onSubmitForm}
                                encType="multipart/form-data"
                            >
                                {Object.keys(fields).map((fieldName) => (
                                    <div key={fieldName} className="mb-4">
                                        <InputRenderer
                                            name={fieldName}
                                            fieldConfig={fields[fieldName]}
                                            value={form.data[fieldName]}
                                            onChange={handleInputChange}
                                        />
                                        {form.errors[fieldName] && (
                                            <p className="text-red-500 text-xs italic">
                                                {form.errors[fieldName]}
                                            </p>
                                        )}
                                    </div>
                                ))}
                                <SubmitButton
                                    onClick={() =>
                                        setShowConfirmationModal(true)
                                    }
                                    isEdit={!!item}
                                />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <ConfirmationModal
                isOpen={showConfirmationModal}
                onConfirm={handleSubmit}
                onCancel={() => setShowConfirmationModal(false)}
                entity={entity}
                isEdit={!!item}
            />

            <SuccessModal
                isOpen={!!flash?.success}
                message={flash?.success || ""}
                onClose={() => {}}
            />
        </AuthenticatedLayout>
    );
};

export default Form;

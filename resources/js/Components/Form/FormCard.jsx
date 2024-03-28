import React, { useMemo } from 'react';
import InputRenderer from '@/Components/Render/InputRenderer';
import { SubmitButton } from '@/Components/Button/SubmitButton';
import ConfirmationModal from '@/Components/Modal/ConfirmationModal';
import { useFormData } from '@/Hooks/useFormData'; 
import { useFormSubmission } from '@/Hooks/useFormSubmission';

const FormCard = ({ item, entity, fields }) => {
    const initialFields = useMemo(() => Object.keys(fields).reduce((acc, fieldName) => {
        acc[fieldName] = item && item[fieldName] !== undefined ? item[fieldName] : "";
        return acc;
    }, {}), [fields, item]);

    const [form, handleInputChange, setForm] = useFormData(initialFields, item);
    const isEditMode = item && item.id !== undefined;
    const storeUrl = `/${entity}`;
    const updateUrl = isEditMode ? `${storeUrl}/update/${item.id}` : storeUrl;
    const handleSubmit = useFormSubmission(storeUrl, updateUrl, isEditMode, setForm);

    const [showConfirmationModal, setShowConfirmationModal] = React.useState(false);

    return (
        <>
            <h2 className="text-base font-semibold leading-7 text-gray-900">
                General Information
            </h2>
            <p className="mt-1 text-sm leading-6 text-gray-600">
                Fill in the form with the correct information.
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
                onConfirm={() => {
                    handleSubmit(form, setForm);
                    setShowConfirmationModal(false);
                }}
                onCancel={() => setShowConfirmationModal(false)}
                entity={entity}
                isEdit={isEditMode}
            />
        </>
    );
};

export default FormCard;

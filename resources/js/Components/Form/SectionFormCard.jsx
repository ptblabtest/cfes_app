import React, { useMemo } from 'react';
import InputRenderer from '@/Components/Render/InputRenderer';
import { SubmitButton } from '@/Components/Button/SubmitButton';
import ConfirmationModal from '@/Components/Modal/ConfirmationModal';
import { useFormData } from '@/Hooks/useFormData'; 
import { useFormSubmission } from '@/Hooks/useFormSubmission';

const SectionFormCard = ({ item, entity, sections }) => {
    const initialFields = useMemo(() => {
        return sections.reduce((acc, section) => {
            Object.keys(section.fields).forEach(fieldName => {
                acc[fieldName] = item && item[fieldName] !== undefined ? item[fieldName] : "";
            });
            return acc;
        }, {});
    }, [sections, item]);

    const [form, handleInputChange, setForm] = useFormData(initialFields, item);
    const isEditMode = item && item.id !== undefined;
    const storeUrl = `/${entity}`;
    const updateUrl = isEditMode ? `${storeUrl}/update/${item.id}` : storeUrl;
    const handleSubmit = useFormSubmission(storeUrl, updateUrl, isEditMode, setForm);

    const [showConfirmationModal, setShowConfirmationModal] = React.useState(false);

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
                            {section.subtitleform.split("\n").map((line, idx) => (
                                <React.Fragment key={idx}>
                                    {line}<br />
                                </React.Fragment>
                            ))}
                        </p>
                    )}
                    <hr className="my-1 border-gray-200 dark:border-gray-600" />
                    {Object.keys(section.fields).map(fieldName => (
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
                    <hr className="my-5 border-gray-200 dark:border-gray-600" />
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

export default SectionFormCard;

import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import InputRenderer from "@/Components/Render/InputRenderer";
import { SubmitButton } from "@/Components/Button/SubmitButton";
import ConfirmationModal from "@/Components/Modal/ConfirmationModal";

const BulkForm = ({ entity, title, bulk }) => {
    const { auth } = usePage().props;
    const [entries, setEntries] = useState([{ id: Date.now(), fields: {} }]);
    const [errors, setErrors] = useState({});
    const [showConfirmationModal, setShowConfirmationModal] = useState(false);

    const handleInputChange = (e, entryId) => {
        const { name, value, type, files } = e.target;
        const newEntries = entries.map(entry => {
            if (entry.id === entryId) {
                return {
                    ...entry,
                    fields: {
                        ...entry.fields,
                        [name]: type === "file" ? files[0] : value,
                    },
                };
            }
            return entry;
        });
        setEntries(newEntries);
    };

    const addEntry = () => {
        setEntries([...entries, { id: Date.now(), fields: {} }]);
    };

    const removeEntry = (entryId) => {
        setEntries(entries.filter(entry => entry.id !== entryId));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        let formData = new FormData();
        entries.forEach((entry, index) => {
            Object.keys(entry.fields).forEach((fieldName) => {
                formData.append(`entries[${index}][${fieldName}]`, entry.fields[fieldName]);
            });
        });

        Inertia.post(`/${entity}/bulk_store`, formData, {
            onError: (errors) => setErrors(errors),
            onSuccess: () => setEntries([{ id: Date.now(), fields: {} }]), // Reset form on success
        });
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />
            <HeaderTitle
                title={"Bulk Form " + title}
                breadcrumbs={[
                    { name: "Home", url: "/dashboard" },
                    { name: title, url: `/${entity}` },
                    { name: "Bulk Entry" },
                ]}
            />
            <div className="mx-auto py-2">
                <form onSubmit={handleSubmit}>
                    {entries.map((entry, index) => (
                        <div key={entry.id} className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4 p-4">
                            <h3 className="text-lg font-semibold">Entry #{index + 1}</h3>
                            {bulk.map((section, idx) => (
                                <React.Fragment key={idx}>
                                    {section.fields.map((field) => (
                                        <InputRenderer
                                            key={field.name}
                                            name={field.name}
                                            fieldConfig={field}
                                            value={entry.fields[field.name]}
                                            onChange={(e) => handleInputChange(e, entry.id)}
                                        />
                                    ))}
                                    {index !== 0 && (
                                        <button type="button" className="text-red-500" onClick={() => removeEntry(entry.id)}>Remove Entry</button>
                                    )}
                                </React.Fragment>
                            ))}
                        </div>
                    ))}
                    <button type="button" onClick={addEntry}>Add Another Entry</button>
                    <SubmitButton onClick={() => setShowConfirmationModal(true)} />
                </form>
            </div>
            <ConfirmationModal
                isOpen={showConfirmationModal}
                onConfirm={handleSubmit}
                onCancel={() => setShowConfirmationModal(false)}
                title={title}
            />
        </AuthenticatedLayout>
    );
};

export default BulkForm;

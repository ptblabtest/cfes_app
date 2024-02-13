import React, { useEffect, useState } from "react";

const InputRenderer = ({ name, fieldConfig, value, onChange, item }) => {
    const [filePreview, setFilePreview] = useState(null);

    const inputClasses =
        "block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6";

    useEffect(() => {
        if (item) {
            const fileItem = item.media?.find(
                (media) => media.collection_name === name
            );

            if (fileItem) {
                const fileUrl = `/media/${fileItem.id}/${fileItem.file_name}`;
                setFilePreview(fileUrl);
            } else {
                setFilePreview(null);
            }
        } else {
            // In create mode, when no 'item' is provided, hide the file preview
            setFilePreview(null);
        }
    }, [item, name]);

    const inputValue = value === null || value === undefined ? "" : value;

    const renderFilePreview = () => {
        if (filePreview) {
            if (
                (fieldConfig.type === "file" || fieldConfig.type === "image") &&
                filePreview
            ) {
                return (
                    <a
                        href={filePreview}
                        target="_blank"
                        rel="noopener noreferrer"
                        className="link"
                    >
                        {filePreview.split("/").pop()} {/* Display file name */}
                    </a>
                );
            }
        }
        return null;
    };

    const handleFileChange = (e) => {
        if (e.target.files) {
            onChange(e);

            if (fieldConfig.type === "image") {
                const reader = new FileReader();
                const file = e.target.files[0];

                reader.onloadend = () => {
                    if (reader.readyState === 2) {
                        // Use reader.result to set the image preview URL
                        setFilePreview(reader.result);
                    }
                };

                reader.onerror = () => {
                    console.error("Error reading file");
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        }
    };

    const renderInput = () => {
        switch (fieldConfig.type) {
            case "text":
            case "number":
            case "email":
            case "password":
            case "date":
                return (
                    <>
                        <label
                            htmlFor={name}
                            className="py-2 block text-sm font-medium leading-6 text-gray-900"
                        >
                            {fieldConfig.label}
                        </label>
                        <input
                            id={name}
                            type={fieldConfig.type}
                            name={name}
                            value={inputValue}
                            onChange={onChange}
                            className={inputClasses}
                            aria-label={name}
                            placeholder={`Isi ${fieldConfig.label}`}
                        />
                    </>
                );
            case "hidden":
                return (
                    <input id={name} type="hidden" name={name} value={value} />
                );
            case "file":
                return (
                    <>
                        <label
                            htmlFor={name}
                            className="py-2 block text-sm font-medium leading-6 text-gray-900"
                        >
                            {fieldConfig.label}
                        </label>
                        <input
                            id={name}
                            type="file"
                            name={name}
                            onChange={handleFileChange}
                            className={inputClasses}
                            aria-label={name}
                            accept="file/*"
                        />
                    </>
                );
            case "image":
                return (
                    <>
                        <label
                            htmlFor={name}
                            className="py-2 block text-sm font-medium leading-6 text-gray-900"
                        >
                            {fieldConfig.label}
                        </label>
                        <input
                            id={name}
                            type="file"
                            name={name}
                            onChange={handleFileChange}
                            className={inputClasses}
                            aria-label={name}
                            accept="image/*"
                        />
                    </>
                );
            case "textarea":
                return (
                    <>
                        <label
                            htmlFor={name}
                            className="py-2 block text-sm font-medium leading-6 text-gray-900"
                        >
                            {fieldConfig.label}
                        </label>
                        <textarea
                            id={name}
                            name={name}
                            onChange={onChange}
                            className={inputClasses}
                            value={inputValue}
                            aria-label={name}
                            placeholder={`Isi ${fieldConfig.label}`}
                        />
                    </>
                );
            case "select":
                const hasOptions = Array.isArray(fieldConfig.options);
                return (
                    <>
                        <label
                            htmlFor={name}
                            className="py-2 block text-sm font-medium leading-6 text-gray-900"
                        >
                            {fieldConfig.label}
                        </label>
                        <select
                            id={name}
                            name={name}
                            value={inputValue || ""}
                            onChange={onChange}
                            className={inputClasses}
                            aria-label={name}
                        >
                            {value === "" && (
                                <option
                                    value=""
                                    disabled
                                >{`Pilih ${fieldConfig.label}`}</option>
                            )}
                            {hasOptions ? (
                                fieldConfig.options.map((option, index) => (
                                    <option key={index} value={option.value}>
                                        {option.label}
                                    </option>
                                ))
                            ) : (
                                <option disabled>No options available</option>
                            )}
                        </select>
                    </>
                );
            case "combobox":
                return (
                    <>
                        <label
                            htmlFor={name}
                            className="py-2 block text-sm font-medium leading-6 text-gray-900"
                        >
                            {fieldConfig.label}
                        </label>
                        <select
                            id={name}
                            name={name}
                            multiple
                            value={value || []}
                            onChange={onChange}
                            className={inputClasses}
                            aria-label={name}
                        >
                            {fieldConfig.options.map((option, index) => (
                                <option key={index} value={option.value}>
                                    {option.label}
                                </option>
                            ))}
                        </select>
                    </>
                );
            default:
                return null;
        }
    };

    return (
        
        <div>
            {renderInput()}
            {renderFilePreview()}
            {(fieldConfig.smallLabel || fieldConfig.url) && (
                <small className="block text-gray-600">
                    {fieldConfig.smallLabel}
                    {fieldConfig.url && (
                        <a
                            href={fieldConfig.url}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="text-blue-600 hover:text-blue-800"
                        >
                            {fieldConfig.urlLabel || "Click for Reference"}
                        </a>
                    )}
                </small>
            )}
        </div>
    );
};

export default InputRenderer;

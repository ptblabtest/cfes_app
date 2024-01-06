import React from "react";
import PropTypes from "prop-types";
import { useState } from "react";

const InputRenderer = ({ name, fieldConfig, value, onChange }) => {
    const [imagePreviewUrl, setImagePreviewUrl] = useState(null);
    const [isModalOpen, setIsModalOpen] = useState(false);

    const urlParams = new URLSearchParams(window.location.search);
    const torId = urlParams.get('tor_id');
    console.log("torId value: ", torId);



    const inputClasses =
        "block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6";

    const renderSmallLabel = () => (
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
    );

    const handleFileChange = (e) => {
        if (
            (fieldConfig.type === "file" || fieldConfig.type === "image") &&
            e.target.files
        ) {
            onChange(e); // Ensure this is correctly passing the event

            // Read the file using FileReader
            const reader = new FileReader();
            const file = e.target.files[0];

            reader.onloadend = () => {
                setImagePreviewUrl(reader.result);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    };

    const toggleModal = () => {
        setIsModalOpen(!isModalOpen);
    };

    const renderInput = () => {
        const placeholderText = `Input ${fieldConfig.label}`;

        const label = (
            <label
                htmlFor={name}
                className="py-2 block text-sm font-medium leading-6 text-gray-900"
            >
                {fieldConfig.label}
            </label>
        );

        if (name === "start_date") {
            return (
                <div className="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <div className="flex flex-col w-full sm:w-1/2">
                        <label htmlFor="start_date" className="py-2 block text-sm font-medium leading-6 text-gray-900">
                            Start Date
                        </label>
                        <input
                            id="start_date"
                            type="date"
                            name="start_date"
                            onChange={onChange}
                            className={inputClasses}
                            aria-label="start_date"
                            placeholder="Start Date"
                        />
                    </div>
        
                    <div className="flex flex-col w-full sm:w-1/2">
                        <label htmlFor="end_date" className="py-2 block text-sm font-medium leading-6 text-gray-900">
                            End Date
                        </label>
                        <input
                            id="end_date"
                            type="date"
                            name="end_date"
                            onChange={onChange}
                            className={inputClasses}
                            aria-label="end_date"
                            placeholder="End Date"
                        />
                    </div>
                </div>
            );
        }
        
        
        

        // Skip rendering of end_date field if start_date is already rendered
        if (name === "end_date") {
            return null;
        }

        switch (fieldConfig.type) {
            case "text":
            case "number":
            case "email":
            case "password":
            case "date":
                return (
                    <div>
                        {label}
                        <input
                            id={name}
                            type={fieldConfig.type}
                            name={name}
                            value={value}
                            onChange={onChange}
                            className={inputClasses}
                            aria-label={name}
                            placeholder={placeholderText}
                        />
                    </div>
                );
            case "textarea":
                return (
                    <div>
                        {label}
                        <textarea
                            id={name}
                            name={name}
                            value={value}
                            onChange={onChange}
                            className={inputClasses}
                            aria-label={name}
                            placeholder={placeholderText}
                        />
                    </div>
                );
            case "select":
                return (
                    <div>
                        {label}
                        <select
                            id={name}
                            name={name}
                            value={value || ""}
                            onChange={onChange}
                            className={inputClasses}
                            aria-label={name}
                        >
                            {value === "" && (
                                <option value="" disabled>
                                    {placeholderText}
                                </option>
                            )}
                            {fieldConfig.options &&
                            Array.isArray(fieldConfig.options) ? (
                                fieldConfig.options.map((option, index) => (
                                    <option key={index} value={option.value}>
                                        {option.label}
                                    </option>
                                ))
                            ) : (
                                <option disabled>No options available</option>
                            )}
                        </select>
                    </div>
                );
            case "file":
            case "image":
                return (
                    <div>
                        {label}
                        <input
                            id={name}
                            type="file"
                            name={name}
                            onChange={handleFileChange}
                            className={inputClasses}
                            aria-label={name}
                            accept={
                                fieldConfig.type === "image"
                                    ? "image/*"
                                    : undefined
                            }
                        />
                        {fieldConfig.type === "image" && imagePreviewUrl && (
                            <img
                                src={imagePreviewUrl}
                                alt={`Preview of ${name}`}
                                className="mt-2 cursor-pointer"
                                style={{
                                    maxWidth: "100px",
                                    maxHeight: "100px",
                                }}
                                onClick={toggleModal}
                            />
                        )}

                        {isModalOpen && (
                            <div
                                className="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center"
                                onClick={toggleModal}
                            >
                                <div className="bg-white p-4 rounded-lg">
                                    <img
                                        src={imagePreviewUrl}
                                        alt={`Preview of ${name}`}
                                    />
                                </div>
                            </div>
                        )}
                    </div>
                );
                case 'readonly':
                    return (
                        
                        <div>
                            {label}
<input
    type="text"
    name="tor_id"
    value={torId}
    readOnly
    className={inputClasses}
/>

                        </div>
                    );
                
            default:
                return null;
        }
    };

    return (
        <div>
            {renderInput()}
            {(fieldConfig.smallLabel || fieldConfig.url) && renderSmallLabel()}
        </div>
    );
};

InputRenderer.propTypes = {
    name: PropTypes.string.isRequired,
    fieldConfig: PropTypes.shape({
        type: PropTypes.string.isRequired,
        label: PropTypes.string.isRequired,
        placeholder: PropTypes.string,
        smallLabel: PropTypes.string,
        url: PropTypes.string,
        urlLabel: PropTypes.string,
    }).isRequired,
    value: PropTypes.oneOfType([
        PropTypes.string,
        PropTypes.number,
        PropTypes.object,
    ]), // Object for file/image
    onChange: PropTypes.func.isRequired,
};

export default InputRenderer;

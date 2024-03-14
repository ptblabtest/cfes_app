// Adjustments in SelectInput.jsx to accept options as a function or array
import React, { useEffect, useState } from "react";

const SelectInput = ({ name, value, onChange, fieldConfig }) => {
    const [options, setOptions] = useState([]);

    useEffect(() => {
        // If options is a function, call it to get the options dynamically
        if (typeof fieldConfig.options === "function") {
            const dynamicOptions = fieldConfig.options();
            Promise.resolve(dynamicOptions).then(setOptions); // Ensure it works with both promises and static values
        } else {
            // Static options array is used directly
            setOptions(fieldConfig.options);
        }
    }, [fieldConfig.options]);

    return (
        <>
            <select
                id={name}
                name={name}
                value={value || ""}
                onChange={onChange}
                className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            >
                <option
                    value=""
                    disabled
                >{`Pilih ${fieldConfig.label}`}</option>
                {options.map((option, index) => (
                    <option key={index} value={option.value}>
                        {option.label}
                    </option>
                ))}
            </select>
        </>
    );
};

export default SelectInput;

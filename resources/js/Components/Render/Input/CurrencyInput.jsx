import React, { useState, useEffect } from 'react';

const CurrencyInput = ({ name, value, onChange, fieldConfig }) => {
    // State to hold the display value
    const [displayValue, setDisplayValue] = useState('');

    useEffect(() => {
        // Format the initial value when component mounts or value changes
        const formattedValue = formatCurrency(value);
        setDisplayValue(formattedValue);
    }, [value]);

    const handleInputChange = (event) => {
        const inputValue = event.target.value;
        // Remove non-numeric characters for processing
        const numericValue = inputValue.replace(/\D/g, '');

        // Update the real value
        onChange({ target: { name: name, value: numericValue } });

        // Format the display value
        const formattedValue = formatCurrency(numericValue);
        setDisplayValue(formattedValue);
    };

    const formatCurrency = (num) => {
        // Use Intl.NumberFormat to format the currency
        const numberFormatter = new Intl.NumberFormat('id-ID', {
            style: 'decimal',
            maximumFractionDigits: 0, // Adjust according to your needs
        });

        return numberFormatter.format(num);
    };

    return (
        <input
            id={name}
            type="text" // Changed to text to allow custom formatting
            name={name}
            value={displayValue}
            onChange={handleInputChange}
            className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            aria-label={name}
            placeholder={fieldConfig.placeholder || `Isi ${fieldConfig.label}`}
        />
    );
};

export default CurrencyInput;

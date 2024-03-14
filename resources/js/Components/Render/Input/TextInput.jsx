import React from 'react';

const TextInput = ({ name, value, onChange, fieldConfig }) => {
  const backgroundClass = fieldConfig.background || '';
  return (
    <input
      id={name}
      type="text"
      name={name}
      value={value || ''}
      onChange={onChange}
      // Include the backgroundClass in the className string
      className={`block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ${backgroundClass}`}
      aria-label={name}
      placeholder={fieldConfig.placeholder || `Isi ${fieldConfig.label}`}
    />
  );
};

export default TextInput;

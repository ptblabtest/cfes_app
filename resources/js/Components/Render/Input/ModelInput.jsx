import React from 'react';

const ModelInput = ({ name, value, onChange, fieldConfig }) => (
  <>
    <input
      id={name}
      type="text"
      name={name}
      value={value || ''}
      onChange={onChange}
      className="bg-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
      aria-label={name}
      readonly
      placeholder={fieldConfig.placeholder || `Isi ${fieldConfig.label}`}
    />
  </>
);

export default ModelInput;

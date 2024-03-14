import React from 'react';

const Label = ({ htmlFor, label, required }) => {
  return (
    <label htmlFor={htmlFor} className="py-2 block text-sm font-medium leading-6 text-gray-900">
      {label}
      {required && <span className="text-red-500"> *</span>}
    </label>
  );
};

export default Label;

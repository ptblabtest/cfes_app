import { useState, useEffect } from 'react';

export const useFormData = (initialFields, item) => {
    const [form, setForm] = useState({
        data: initialFields,
        errors: {},
    });

    const handleInputChange = (e) => {
        const { name, value, type, files } = e.target;
        setForm(prevForm => ({
            ...prevForm,
            data: {
                ...prevForm.data,
                [name]: type === "file" ? files[0] : value,
            },
        }));
    };

    useEffect(() => {
        const urlParams = new URLSearchParams(window.location.search);
        let shouldUpdateFormData = false;
        const formData = { ...initialFields };

        urlParams.forEach((value, key) => {
            if (formData.hasOwnProperty(key) && formData[key] !== value) {
                formData[key] = value;
                shouldUpdateFormData = true;
            }
        });

        if (item) {
            Object.keys(item).forEach(key => {
                if (formData.hasOwnProperty(key) && formData[key] !== item[key]) {
                    formData[key] = item[key];
                    shouldUpdateFormData = true;
                }
            });
        }

        if (shouldUpdateFormData) {
            setForm(form => ({ ...form, data: formData }));
        }
    }, [item, initialFields]);

    return [form, handleInputChange, setForm];
};

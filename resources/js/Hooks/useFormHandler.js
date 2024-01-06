import { useState } from "react";
import { Inertia } from "@inertiajs/inertia";

const useFormHandler = (item, entity, initialFields) => {
    const [form, setForm] = useState({
        data: Object.keys(initialFields).reduce((acc, fieldName) => {
            acc[fieldName] = item ? item[fieldName] : "";
            return acc;
        }, {}),
        errors: {}
    });
    
    const handleInputChange = (e) => {
        const target = e.target;
        const name = target.name;
    
        // Check if it's a file input
        if (target.type === 'file') {
            // Assuming single file upload
            const file = target.files[0];
            setForm(prevForm => ({
                ...prevForm,
                data: { ...prevForm.data, [name]: file }
            }));
        } else {
            // For other input types, update the value
            setForm(prevForm => ({
                ...prevForm,
                data: { ...prevForm.data, [name]: target.value }
            }));
        }
    };
    
    const handleSubmit = (e) => {
        e.preventDefault();
    
        let formData = new FormData();
    
        Object.keys(form.data).forEach(key => {
            formData.append(key, form.data[key] instanceof File ? form.data[key] : String(form.data[key]));
        });
    
        let url, method;
    
        if (item) {
            // For update functionality
            url = `/${entity}/update/${item.id}`;
            method = 'post'; // Using 'post' for Inertia's method override
            formData.append('_method', 'PUT');
        } else {
            // For create functionality
            url = `/${entity}`;
            method = 'post';
        }
    
        Inertia[method](url, formData, {
            onError: errors => setForm(prevForm => ({ ...prevForm, errors })),
            headers: { 'Content-Type': 'multipart/form-data' }
        });
    };
    
    
    

    return { form, handleInputChange, handleSubmit };
};

export default useFormHandler;
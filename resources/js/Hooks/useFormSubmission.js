import axios from 'axios';

export const useFormSubmission = (storeUrl, updateUrl, isEditMode) => {
    const handleSubmit = async (formData, setForm) => {
        let axiosFormData = new FormData();
        Object.keys(formData.data).forEach(key => {
            axiosFormData.append(key, formData.data[key]);
        });

        if (isEditMode) {
            axiosFormData.append('_method', 'PATCH');
        }

        try {
            const config = {
                headers: { 'Content-Type': 'multipart/form-data' },
            };
            await axios.post(
                isEditMode ? updateUrl : storeUrl,
                axiosFormData,
                config
            );
            window.history.back();
        } catch (error) {
            if (error.response && error.response.data.errors) {
                setForm(prevForm => ({
                    ...prevForm,
                    errors: error.response.data.errors,
                }));
            }
        }
    };

    return handleSubmit;
};

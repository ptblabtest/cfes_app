import React, { useState } from 'react';
import axios from 'axios';

const ImportExcel = ({ entities }) => {
    const [selectedEntity, setSelectedEntity] = useState('');
    const [file, setFile] = useState(null);
    const [uploading, setUploading] = useState(false);
    const [message, setMessage] = useState('');

    const handleEntityChange = (event) => {
        setSelectedEntity(event.target.value);
    };

    const handleFileChange = (event) => {
        setFile(event.target.files[0]);
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        if (!file || !selectedEntity) {
            setMessage('Please select a file and entity.');
            return;
        }

        const formData = new FormData();
        formData.append('file', file);
        formData.append('entity', selectedEntity);

        setUploading(true);

        try {
            const response = await axios.post('/import', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
            setMessage(response.data.success || 'File uploaded successfully.');
        } catch (error) {
            setMessage(error.response.data.error || 'An error occurred.');
        } finally {
            setUploading(false);
        }
    };

    return (
        <div>
            <h2>Import Excel File</h2>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>
                        Select Entity:
                        <select value={selectedEntity} onChange={handleEntityChange}>
                            <option value="">Select an entity</option>
                            {entities.map((entity) => (
                                <option key={entity} value={entity}>{entity}</option>
                            ))}
                        </select>
                    </label>
                </div>
                <div>
                    <label>
                        Upload File:
                        <input type="file" onChange={handleFileChange} accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                    </label>
                </div>
                <button type="submit" disabled={uploading}>
                    {uploading ? 'Uploading...' : 'Upload'}
                </button>
            </form>
            {message && <p>{message}</p>}
        </div>
    );
};

export default ImportExcel;

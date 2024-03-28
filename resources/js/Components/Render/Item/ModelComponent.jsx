import React from 'react';

const ModelComponent = ({ modelPath }) => {
    const options = [
        { value: 'App\\Models\\ProjectActivity', label: 'Kegiatan Project' },
        { value: 'App\\Models\\SalesActivity', label: 'Kegiatan Sales' },
        { value: 'App\\Models\\Project', label: 'Implementasi' },
        { value: 'App\\Models\\Deal', label: 'Kesepakatan' },
        { value: 'App\\Models\\Lead', label: 'Calon Client' },
    ];

    const option = options.find(option => option.value === modelPath);
    const label = option ? option.label : 'Unknown';

    return <span>{label}</span>;
};

export default ModelComponent;

import React from 'react';

const ModelComponent = ({ modelPath }) => {
    const modelName = modelPath.split('\\').pop();
    
    return <span>{modelName}</span>;
};

export default ModelComponent;

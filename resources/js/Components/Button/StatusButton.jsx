import React from 'react';

const StatusButton = ({ onClick }) => {
    return (
        <button
            onClick={onClick}
            className="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
            Change Status
        </button>
    );
};

export default StatusButton;

import React from "react";

const StatusComponent = ({ status }) => {
    let statusClass = "";

    if (!status) {
        return "No Status";
    }

    switch (status.toLowerCase()) {
        case "draft":
            statusClass = "bg-red-50 text-red-700 ring-red-600/10";
            break;
        case "review":
            statusClass = "bg-yellow-50 text-yellow-800 ring-yellow-600/20";
            break;
        case "disetujui": // Approved in Indonesian
            statusClass = "bg-green-50 text-green-700 ring-green-600/20";
            break;
        default:
            statusClass = "bg-gray-50 text-gray-600 ring-gray-500/10";
    }

    return (
        <span
            className={`inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset ${statusClass}`}
        >
            {status}
        </span>
    );
};

export default StatusComponent;

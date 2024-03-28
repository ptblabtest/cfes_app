import React from "react";

const TableHeader = ({ fields, onSort, sortField, sortDirection }) => {
    return (
        <thead className="bg-gray-50">
            <tr>
                {Object.keys(fields).map(fieldKey => (
                    <th
                        key={`${fieldKey}-name`}
                        className="px-4 py-2 text-left text-xs text-gray-500 uppercase tracking-wider cursor-pointer whitespace-normal break-words"
                        onClick={() => onSort(fieldKey)}
                    >
                        {fields[fieldKey].label}
                        {sortField === fieldKey && (sortDirection === "asc" ? " ↑" : " ↓")}
                    </th>
                ))}
            </tr>
        </thead>
    );
};

export default TableHeader;

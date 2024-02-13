import React from "react";

const TableHeader = ({ fields, onSort, sortField, sortDirection }) => {
    return (
        <thead className="bg-gray-50">
            <tr>
                {Object.keys(fields).map(fieldKey => (
                    <th
                        key={`${fieldKey}-name`}
                        className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
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

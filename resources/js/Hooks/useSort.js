import { useState, useMemo } from "react";

const useSort = (items, defaultSortField = null) => {
    const [sortField, setSortField] = useState(defaultSortField);
    const [sortDirection, setSortDirection] = useState("asc");

    const sortedItems = useMemo(() => {
        if (!sortField) return items;

        return [...items].sort((a, b) => {
            if (a[sortField] < b[sortField]) return sortDirection === "asc" ? -1 : 1;
            if (a[sortField] > b[sortField]) return sortDirection === "asc" ? 1 : -1;
            return 0;
        });
    }, [items, sortField, sortDirection]);

    const requestSort = (field) => {
        const isAsc = sortField === field && sortDirection === "asc";
        setSortField(field);
        setSortDirection(isAsc ? "desc" : "asc");
    };

    return { items: sortedItems, requestSort, sortField, sortDirection };
};

export default useSort;

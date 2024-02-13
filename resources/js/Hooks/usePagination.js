import { useState, useMemo } from "react";

const usePagination = (items, itemsPerPage = 10) => {
    const [currentPage, setCurrentPage] = useState(1);

    // Ensure items is an array and calculate total pages
    const totalPages = useMemo(() => {
        return Array.isArray(items) ? Math.ceil(items.length / itemsPerPage) : 0;
    }, [items, itemsPerPage]);

    // Calculate paginated items
    const paginatedItems = useMemo(() => {
        return Array.isArray(items)
            ? items.slice((currentPage - 1) * itemsPerPage, currentPage * itemsPerPage)
            : [];
    }, [items, currentPage, itemsPerPage]);

    const setPage = (page) => {
        setCurrentPage(page);
    };

    return { currentPage, totalPages, paginatedItems, setPage, itemsPerPage };
};

export default usePagination;

// usePagination.js
import { useState } from "react";

const usePagination = (items, itemsPerPage = 10) => {
    const [currentPage, setCurrentPage] = useState(1);
    const totalPages = Math.ceil(items.length / itemsPerPage);

    const paginatedItems = items.slice(
        (currentPage - 1) * itemsPerPage,
        currentPage * itemsPerPage
    );

    const setPage = (page) => {
        setCurrentPage(page);
    };

    return { currentPage, totalPages, paginatedItems, setPage, itemsPerPage };

};

export default usePagination;

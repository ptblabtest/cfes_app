import React, { useState } from "react";
import GridItem from "@/Components/Grid/GridItem";
import Pagination from "../Pagination/Pagination";
import usePagination from "@/Hooks/usePagination";

const EntityGrid = ({ items, fields, entity }) => {
    const itemsPerPage = 10;

    const { currentPage, totalPages, paginatedItems, setPage } = usePagination(
        items,
        itemsPerPage
    );

    return (
        <div className="max-w-7xl mt-2 mx-auto sm:px-6 lg:px-8">
            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div className="p-6">
                    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        {paginatedItems.map((item) => (
                            <GridItem
                                key={item.id}
                                item={item}
                                fields={fields}
                                entity={entity}
                            />
                        ))}
                    </div>
                    <Pagination
                        currentPage={currentPage}
                        totalPages={totalPages}
                        itemsPerPage={itemsPerPage}
                        totalItems={items.length}
                        onPageChange={setPage}
                    />
                </div>
            </div>
        </div>
    );
};

export default EntityGrid;

import React from "react";
import GridItem from "@/Components/Grid/GridItem";
import Pagination from "@/Components/Pagination/Pagination";
import usePagination from "@/Hooks/usePagination";

const Grids = ({ items, fields, entity }) => {
    const itemsPerPage = 10;

    const { currentPage, totalPages, paginatedItems, setPage } = usePagination(items, itemsPerPage);

    return (
        <>
            <div className="px-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-2">
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
        </>
    );
};

export default Grids;

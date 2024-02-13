import React from "react";
import TableHeader from "@/Components/Table/TableHeader";
import TableRow from "@/Components/Table/TableRow";
import useSort from "@/Hooks/useSort";
import usePagination from "@/Hooks/usePagination";
import Pagination from "@/Components/Pagination/Pagination";

const Tables = ({ items, fields, entity }) => {
    const itemsPerPage = 10;

    const {
        items: sortedItems,
        requestSort,
        sortField,
        sortDirection,
    } = useSort(items);
    
    const { currentPage, totalPages, paginatedItems, setPage } = usePagination(sortedItems, itemsPerPage);

    return (
        <>
            <div className="overflow-x-auto">
                <table className="table-auto min-w-full divide-y divide-gray-200 sticky mb-2">
                    <TableHeader
                        fields={fields}
                        onSort={requestSort}
                        sortField={sortField}
                        sortDirection={sortDirection}
                    />
                    <tbody className="bg-white divide-y divide-gray-200">
                        {paginatedItems.map((item) => (
                            <TableRow
                                key={item.id}
                                item={item}
                                fields={fields}
                                entity={entity}
                            />
                        ))}
                    </tbody>
                </table>
            </div>
            <Pagination
                currentPage={currentPage}
                totalPages={totalPages}
                itemsPerPage={itemsPerPage}
                totalItems={sortedItems.length}
                onPageChange={setPage}
            />
        </>
    );
};

export default Tables;

import React from "react";
import TableHeader from "@/Components/Table/TableHeader";
import TableRow from "@/Components/Table/TableRow";
import useSort from "@/Hooks/useSort";
import usePagination from "@/Hooks/usePagination";
import Pagination from "@/Components/Pagination/Pagination";
import DropdownMenu from "@/Components/Dropdown/DropdownMenu";

const EntityTable = ({ items, fields, entity }) => {
    const itemsPerPage = 10;
    const totalItems = items.length;

    const {
        items: sortedItems,
        requestSort,
        sortField,
        sortDirection,
    } = useSort(items);

    const { currentPage, totalPages, paginatedItems, setPage } =
        usePagination(sortedItems);

    return (
        <div className="max-w-7xl mt-2 mx-auto sm:px-6 lg:px-8">
            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div className="p-2">
                    <div className="flex mb-1 justify-end">
                    <DropdownMenu entity={entity} />
                    </div>

                    <table className="table-auto min-w-full divide-y divide-gray-200">
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
                    <Pagination
                        currentPage={currentPage}
                        totalPages={totalPages}
                        itemsPerPage={itemsPerPage}
                        totalItems={totalItems}
                        onPageChange={setPage}
                    />
                </div>
            </div>
        </div>
    );
};

export default EntityTable;

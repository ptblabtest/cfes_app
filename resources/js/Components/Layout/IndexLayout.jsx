import React from "react";
import ActionButton from "../Button/ActionButton";

const IndexLayout = ({ children, setFilter, createUrl, exportUrl }) => {
    const handleFilterChange = (e) => setFilter(e.target.value);
    return (
        <div className="max-w-5xl mt-2 mx-auto sm:px-6 lg:px-8">
            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div className="flex justify-between items-center py-3 px-4">
                    <input
                        type="text"
                        placeholder="Search..."
                        className="py-2 px-4 border rounded"
                        onChange={handleFilterChange}
                    />
                    <div className="flex gap-2">
                        {createUrl && (
                            <ActionButton
                                href={createUrl}
                                className="bg-[#005A30] text-white py-2 px-4 rounded hover:bg-green-700 transition-colors duration-300"
                            >
                                Data Baru
                            </ActionButton>
                        )}
                        {exportUrl && (
                            <ActionButton
                                href={exportUrl}
                                className="bg-[#5A002A] text-white py-2 px-4 rounded hover:bg-red-700 transition-colors duration-300"
                            >
                                Export Excel
                            </ActionButton>
                        )}
                    </div>
                </div>
                <hr className="my-1" />
                <div className="px-1">{children}</div>
            </div>
        </div>
    );
};

export default IndexLayout;

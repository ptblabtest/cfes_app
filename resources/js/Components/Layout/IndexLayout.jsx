import React from "react";
import ActionButton from "../Button/ActionButton";

const IndexLayout = ({ children, setFilter, entity, createUrl }) => {
    const handleFilterChange = (e) => setFilter(e.target.value);

    const exportUrl = `/export/${entity}`;
    
    return (
        <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div className="flex justify-between items-center py-2 px-2">
                {setFilter && (
                    <input
                        type="text"
                        placeholder="Search..."
                        className="py-1 px-1 border rounded"
                        onChange={handleFilterChange}
                    />
                )}
                <div className="flex gap-2">
                    <ActionButton
                        href={createUrl}
                        className="bg-[#005A30] text-white py-2 px-2 rounded hover:bg-green-700 transition-colors duration-300 text-sm"
                    >
                        Data Baru
                    </ActionButton>
                    <ActionButton
                        href={exportUrl}
                        className="bg-[#5A002A] text-white py-2 px-2 rounded hover:bg-red-700 transition-colors duration-300 text-sm"
                    >
                        Export Excel
                    </ActionButton>
                </div>
            </div>
            <hr className="my-1" />
            <div className="">{children}</div>
        </div>
    );
};

export default IndexLayout;

import React from "react";

const HeaderTitle = ({ title, entity }) => {
    return (
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div className="p-6">
                    <div className="flex justify-between items-center">
                        <h2 className="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                            {title}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default HeaderTitle;

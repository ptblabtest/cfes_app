import React from "react";
import Breadcrumbs from "../Breadcrumbs";

const HeaderTitle = ({
    title,
    breadcrumbs,
    classTitle = null,
    classSize = null,
}) => {
    return (
        <div className="sticky top-0 z-40">
            <div className={classSize || "max-w-5xl mx-auto sm:px-6 lg:px-8"}>
                <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div className="p-4">
                        <div
                            className={`flex ${
                                breadcrumbs
                                    ? "justify-between"
                                    : "justify-center"
                            } items-center space-x-2`}
                        >
                            <h2
                                className={
                                    classTitle ||
                                    "font-bold leading-7 text-gray-900 truncate sm:text-2xl lg:text-xl text-center"
                                }
                            >
                                {title}
                            </h2>
                            {breadcrumbs && (
                                <Breadcrumbs breadcrumbs={breadcrumbs} />
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default HeaderTitle;

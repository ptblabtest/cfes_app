import React from "react";
import { Link } from "@inertiajs/react";

const Breadcrumbs = ({ title, breadcrumbs }) => {
    return (
        <div>
            {/* Adjusted title size to be smaller */}
            <h2 className="text-sm font-bold leading-7 text-gray-900 sm:truncate sm:text-xl sm:tracking-tight">
                {title}
            </h2>
            {breadcrumbs && breadcrumbs.length > 0 && (
                <nav aria-label="breadcrumb">
                    <ol className="flex space-x-1 text-sm"> {/* Text size adjusted for breadcrumbs */}
                        {breadcrumbs.map((breadcrumb, index) => (
                            <React.Fragment key={index}>
                                {breadcrumb.url ? (
                                    <li>
                                        <Link href={breadcrumb.url} className="text-gray-500 hover:text-gray-700">
                                            {breadcrumb.name}
                                        </Link>
                                    </li>
                                ) : (
                                    <li className="text-gray-500 font-bold" aria-current="page">
                                        {breadcrumb.name}
                                    </li>
                                )}
                                {/* Separator also has the same smaller text size applied */}
                                {index < breadcrumbs.length - 1 && <li className="text-sm">|</li>} {/* Text size class added for consistency */}
                            </React.Fragment>
                        ))}
                    </ol>
                </nav>
            )}
        </div>
    );
};

export default Breadcrumbs;

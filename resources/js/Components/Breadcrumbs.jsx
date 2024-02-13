import React from "react";
import { Link } from "@inertiajs/react";

const HeaderTitle = ({ title, breadcrumbs }) => {
    return (
        <div>
            <h2 className="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                {title}
            </h2>
            {breadcrumbs && breadcrumbs.length > 0 && (
                <nav aria-label="breadcrumb">
                    <ol className="flex space-x-4">
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
                                {index < breadcrumbs.length - 1 && <li>/</li>}
                            </React.Fragment>
                        ))}
                    </ol>
                </nav>
            )}
        </div>
    );
};

export default HeaderTitle;

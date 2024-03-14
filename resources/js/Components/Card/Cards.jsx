import React from "react";
import ItemRenderer from "@/Components/Render/ItemRenderer";
import { Link } from "@inertiajs/react";

const Cards = ({ item, fields, title, entity }) => {
    const editUrl = `/${entity}/edit/${item.id}`;

    return (
        <>
            <div className="p-4">
                <div className="flex items-center justify-between mb-2">
                    <h2 className="text-lg font-semibold leading-2 text-gray-900">
                        Informasi Umum {title}
                    </h2>
                    <div className="flex items-center space-x-2">
                        <Link
                            href={editUrl}
                            className="inline-flex justify-center py-1 px-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
                        >
                            Edit
                        </Link>
                    </div>
                </div>

                {Object.keys(fields).map((fieldKey) => (
                    <div key={fieldKey} className="mb-1">
                        <dl className="divide-y divide-gray-100">
                            <div className="mt-1 border-t border-gray-100">
                                <div className="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt className="text-md font-medium leading-6 text-gray-900">
                                        {fields[fieldKey].label}
                                    </dt>
                                    <dd className="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <ItemRenderer
                                            item={item}
                                            fieldKey={fieldKey}
                                            fieldConfig={fields[fieldKey]}
                                        />
                                    </dd>
                                </div>
                            </div>
                        </dl>
                    </div>
                ))}
            </div>
        </>
    );
};

export default Cards;

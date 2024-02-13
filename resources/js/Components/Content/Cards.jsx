import React, { useState } from "react";
import ItemRenderer from "@/Components/Render/ItemRenderer";
import { Link } from "@inertiajs/react";

const Cards = ({ item, fields, editUrl, imageUrls }) => {
    return (
        <>
            <div className="p-6 md:w-1/2">
                {Object.keys(fields).map((fieldKey, index) => {
                    if (fieldKey !== "image") {
                        return (
                            <div key={fieldKey} className="mb-4">
                                {index === 0 ? (
                                    <div className="flex items-center justify-between">
                                        <h1 className="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                                            {item[fieldKey]}
                                        </h1>
                                        <Link
                                            href={editUrl}
                                            className="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
                                        >
                                            Edit
                                        </Link>
                                    </div>
                                ) : (
                                    <>
                                        <h3 className="text-lg leading-6 font-medium text-gray-900">
                                            {fields[fieldKey].label}
                                        </h3>
                                        <div className="mt-2">
                                            <ItemRenderer
                                                item={item}
                                                fieldKey={fieldKey}
                                                fieldConfig={fields[fieldKey]}
                                            />
                                        </div>
                                    </>
                                )}
                            </div>
                        );
                    }
                    return null;
                })}
            </div>
        </>
    );
};

export default Cards;

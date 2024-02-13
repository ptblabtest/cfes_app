import React from "react";
import { Link } from "@inertiajs/react";
import ItemRenderer from "@/Components/Render/ItemRenderer";

const CardLayout = ({ relatedData, relationConfig, relationKey }) => {

    return (
        <div className="mb-4 bg-white dark:bg-green-900 rounded-md">
            {Object.keys(relationConfig.fields).map((fieldKey) => (
                <div
                    className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    key={fieldKey}
                >
                    <dt className="text-lg font-medium leading-6 text-gray-900">
                        {relationConfig.fields[fieldKey].label}
                    </dt>
                    <dd className="mt-1 text-lg leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <ItemRenderer
                            item={relatedData}
                            fieldKey={fieldKey}
                            fieldConfig={relationConfig.fields[fieldKey]}
                        />
                    </dd>
                </div>
            ))}
            <div className="px-4 py-3 text-right sm:px-6">
                <Link
                    href={`/p/${relationKey}/edit/${relatedData.id}`}
                    className="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
                >
                    Edit
                </Link>
            </div>
        </div>
    );
};

export default CardLayout;

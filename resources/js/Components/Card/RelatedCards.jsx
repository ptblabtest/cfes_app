import React from "react";
import { Link } from "@inertiajs/react";
import ItemRenderer from "../Render/ItemRenderer";
import Tables from "../Tables";
import IndexLayout from "../Layout/IndexLayout";

const RelatedCards = ({ item, relation_show }) => {
    return (
        <div className="mx-auto">
            {relation_show &&
                Object.entries(relation_show).map(
                    ([relationKey, relationConfig]) => {
                        const relatedDataArray = item[relationKey];

                        return relationConfig.query ? (
                            <IndexLayout
                                key={relationKey}
                                createUrl={relationConfig.create?.url}
                            >
                                <Tables
                                    items={relatedDataArray}
                                    fields={relationConfig.fields}
                                    entity={relationKey}
                                />
                            </IndexLayout>
                        ) : (
                            <div
                                key={relationKey}
                                className="mb-8 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg"
                            >
                                <h2 className="text-2xl font-bold leading-7 sm:text-3xl sm:truncate">
                                    {relationConfig.title}
                                </h2>
                                <div className="p-6">
                                    {relationConfig.isCreatable && (
                                        <div className="text-center">
                                            <Link
                                                href={relationConfig.create.url}
                                                className="..."
                                            >
                                                {relationConfig.create.label}
                                            </Link>
                                        </div>
                                    )}
                                    {!relationConfig.isCreatable &&
                                        relatedDataArray.map(
                                            (relatedData, index) => (
                                                <div
                                                    key={index}
                                                    className="mb-4 bg-white dark:bg-green-900 rounded-md"
                                                >
                                                    {Object.keys(
                                                        relationConfig.fields
                                                    ).map((fieldKey) => (
                                                        <div
                                                            key={fieldKey}
                                                            className="mb-4"
                                                        >
                                                            <dl className="divide-y divide-gray-100">
                                                                <div className="mt-1 border-t border-gray-100">
                                                                    <div className="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                                        <dt className="text-md font-medium leading-6 text-gray-900">
                                                                            {
                                                                                relationConfig
                                                                                    .fields[
                                                                                    fieldKey
                                                                                ]
                                                                                    .label
                                                                            }
                                                                        </dt>
                                                                        <dd className="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                                            <ItemRenderer
                                                                                item={
                                                                                    relatedData
                                                                                }
                                                                                fieldKey={
                                                                                    fieldKey
                                                                                }
                                                                                fieldConfig={
                                                                                    relationConfig
                                                                                        .fields[
                                                                                        fieldKey
                                                                                    ]
                                                                                }
                                                                            />
                                                                        </dd>
                                                                    </div>
                                                                </div>
                                                            </dl>
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
                                            )
                                        )}
                                </div>
                            </div>
                        );
                    }
                )}
        </div>
    );
};

export default RelatedCards;

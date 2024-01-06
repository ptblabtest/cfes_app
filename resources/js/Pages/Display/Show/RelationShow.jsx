import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import ItemRenderer from "@/Components/Render/ItemRenderer";

const RelationShow = ({ item, title, auth, fields, entity, relation_show }) => {
    const relatedData = item[relation_show.relation];
    const createUrl = relation_show.create.url + item.id;
    const createLabel = relation_show.create.label;

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />

            <div className="mx-auto py-5">
                <div className="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <div className="md:flex">
                            {/* Image Section */}
                            {fields.image && (
                                <div className="md:w-1/2">
                                    <ItemRenderer
                                        item={item}
                                        fieldKey="image"
                                        fieldConfig={fields.image}
                                    />
                                </div>
                            )}

                            {/* Details Section */}
                            <div className="p-6 md:w-1/2">
                                {Object.keys(fields).map((fieldKey, index) => {
                                    if (fieldKey !== "image") {
                                        return (
                                            <div
                                                key={fieldKey}
                                                className="mb-4"
                                            >
                                                {index === 0 ? (
                                                    <h1 className="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                                                        {item[fieldKey]}
                                                    </h1>
                                                ) : (
                                                    <>
                                                        <h3 className="text-lg leading-6 font-medium text-gray-900">
                                                            {
                                                                fields[fieldKey]
                                                                    .label
                                                            }
                                                        </h3>
                                                        <div className="mt-2">
                                                            <ItemRenderer
                                                                item={item}
                                                                fieldKey={
                                                                    fieldKey
                                                                }
                                                                fieldConfig={
                                                                    fields[
                                                                        fieldKey
                                                                    ]
                                                                }
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
                            <div className="p-6">
                                <h2 className="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                                    Related {relation_show.relation} Data
                                </h2>
                                {relatedData ? (
                                    Object.keys(relation_show.fields).map(
                                        (fieldKey) => (
                                            <div
                                                key={fieldKey}
                                                className="mb-4"
                                            >
                                                <h3 className="text-lg leading-6 font-medium text-gray-900">
                                                    {
                                                        relation_show.fields[
                                                            fieldKey
                                                        ].label
                                                    }
                                                </h3>
                                                <div className="mt-2">
                                                    <ItemRenderer
                                                        item={relatedData}
                                                        fieldKey={fieldKey}
                                                        fieldConfig={
                                                            relation_show
                                                                .fields[
                                                                fieldKey
                                                            ]
                                                        }
                                                    />
                                                </div>
                                            </div>
                                        )
                                    )
                                ) : (
                                    <>
                                        <p>
                                            No related {relation_show.relation}{" "}
                                            data available.
                                        </p>
                                        <Link
                                            href={createUrl}
                                            className="mt-2 text-blue-500 hover:text-blue-700"
                                        >
                                            {createLabel}
                                        </Link>
                                    </>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default RelationShow;

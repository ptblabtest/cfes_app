import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import ItemRenderer from "@/Components/Render/ItemRenderer";

const Show = ({ item, title, auth, fields, entity, relation_show }) => {


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

                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default Show;

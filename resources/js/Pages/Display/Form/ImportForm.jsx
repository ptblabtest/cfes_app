import React, { useState } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import { Inertia } from "@inertiajs/inertia";
import { SubmitButton } from "@/Components/Button/SubmitButton";

const ImportForm = ({ title, auth }) => {
    const [file, setFile] = useState(null);
    const [entity, setEntity] = useState("");

    const handleSubmit = (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append("file", file);

        Inertia.post(`/import/${entity}`, formData, {
            onBefore: () => !!file && !!entity,
            onSuccess: () => setFile(null),
        });
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />
            <HeaderTitle
                title={"Import Data"}
                breadcrumbs={[
                    { name: "Home", url: "/dashboard" },
                    { name: "Import Data", current: true },
                ]}
            />

            <div className="mx-auto py-2">
                <div className="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6">
                            <h2 className="text-base font-semibold leading-7 text-gray-900">
                                Form Import
                            </h2>
                            <p className="mt-1 text-sm leading-6 text-gray-600">
                                Import File excel dari Template atau Smart
                                Patrol ke dalam sistem
                            </p>
                            <hr className="my-4 border-gray-200 dark:border-gray-600" />

                            <form onSubmit={handleSubmit} className="py-1">
                                <dl>
                                    <dt className="py-2 text-sm font-medium leading-6 text-gray-900">
                                        Pilih Data : 
                                    </dt>
                                    <dd>
                                        <select
                                            className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            onChange={(e) =>
                                                setEntity(e.target.value)
                                            }
                                            value={entity}
                                        >
                                            <option value="">
                                                Pilih Data
                                            </option>
                                            <option value="locations">
                                                Lokasi
                                            </option>
                                            <option value="clients">
                                                Klien
                                            </option>
                                        </select>
                                    </dd>
                                    <dt className="py-2 text-sm font-medium leading-6 text-gray-900">Upload File:</dt>
                                    <dd>
                                        <input
                                            type="file"
                                            className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mb-3"
                                            onChange={(e) =>
                                                setFile(e.target.files[0])
                                            }
                                        />
                                    </dd>
                                </dl>
                                <SubmitButton isEdit={false} />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default ImportForm;

import React, { useRef } from 'react';
import Modal from '../Modal';
import { Inertia } from "@inertiajs/inertia";

const ImportModal = ({ entity, isOpen, onClose }) => {
    const fileInputRef = useRef(null);

    const handleFileUpload = (event) => {
        event.preventDefault();

        if (fileInputRef.current && fileInputRef.current.files.length > 0) {
            const file = fileInputRef.current.files[0];
            const formData = new FormData();
            formData.append("file", file);

            Inertia.post(`/${entity}/import`, formData, {
                onSuccess: () => {
                    onClose();
                },
            });
        }
    };

    return (
        <Modal show={isOpen} onClose={onClose} maxWidth="md">
            <div className="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div className="sm:flex sm:items-start">
                    <div className="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 className="text-lg leading-6 font-medium text-gray-900">
                            Import Data
                        </h3>
                        <div className="mt-2">
                            <p className="text-sm text-gray-500">
                                Choose a file to import data.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div className="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button
                    type="button"
                    className="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                    onClick={handleFileUpload}
                >
                    Upload
                </button>
                <button
                    type="button"
                    className="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                    onClick={onClose}
                >
                    Cancel
                </button>
                <div className="px-4 py-3 sm:px-6">
                    <input
                        ref={fileInputRef}
                        type="file"
                        className="border p-2 w-full"
                    />
                </div>
            </div>
        </Modal>
    );
};

export default ImportModal;

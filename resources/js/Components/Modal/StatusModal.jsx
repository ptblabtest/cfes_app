import React from 'react';
import Modal from '../Modal';

const StatusModal = ({ isOpen, onClose, status, setStatus, comment, setComment, submitStatusChange }) => {
    return (
        <Modal show={isOpen} onClose={onClose} maxWidth="md">
            <div className="p-6">
                <h2 className="text-xl mb-4 font-semibold text-gray-800 dark:text-white">Ganti Status</h2>
                <div className="mb-4">
                    <label htmlFor="approval_status" className="block text-sm font-medium text-gray-700 dark:text-gray-300">Ganti Status Project</label>
                    <select
                        id="approval_status"
                        value={status}
                        onChange={(e) => setStatus(e.target.value)}
                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                        <option value="Draft">Draft</option>
                        <option value="Review">Review</option>
                        <option value="Approved">Approved</option>
                    </select>
                </div>
                <div className="mb-4">
                    <label htmlFor="comment" className="block text-sm font-medium text-gray-700 dark:text-gray-300">Status Terkini</label>
                    <textarea
                        id="comment"
                        value={comment}
                        onChange={(e) => setComment(e.target.value)}
                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    />
                </div>
                <button 
                    onClick={submitStatusChange} 
                    className="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
                >
                    Submit
                </button>
            </div>
        </Modal>
    );
};

export default StatusModal;

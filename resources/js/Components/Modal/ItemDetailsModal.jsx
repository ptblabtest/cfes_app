import { useState } from "react";
import Cards from "../Card/Cards";
import Modal from "../Modal";
import { XMarkIcon } from "@heroicons/react/24/outline";

const ItemDetailsModal = ({ item, fields, isOpen, onClose }) => {
    const [isCloseable, setIsCloseable] = useState(false);

    const handleClose = () => {
        setIsCloseable(true);
        onClose();
    };

    return (
        <Modal
            show={isOpen}
            closeable={isCloseable}
            onClose={handleClose}
            maxWidth="2xl"
            height="screen"
        >
            <div className="bg-white px-4 py-3 sm:py-4 flex justify-between items-center">
                <h3 className="text-xl leading-6 font-medium text-gray-900">
                    Item Details
                </h3>
                <button
                    id="close-btn"
                    className="rounded-full p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 focus:outline-none"
                    onClick={handleClose}
                >
                    <XMarkIcon className="h-6 w-6" aria-hidden="true" />
                </button>
            </div>
            <div className="p-4 h-96 overflow-y-auto">
                <div className="mx-auto py-2">
                    <div className="max-w-5xl mx-auto sm:px-6 lg:px-8">
                        <div className="md:flex">
                            <Cards item={item} fields={fields} />
                        </div>
                    </div>
                </div>
            </div>
        </Modal>
    );
};

export default ItemDetailsModal;

import Modal from "../Modal";

const ImageModal = ({ isOpen, onClose, imageUrl }) => {
    return (
        <Modal show={isOpen} onClose={onClose} maxWidth="md">
            <div className="bg-white p-4">
                <img src={imageUrl} alt="Preview" className="max-w-full h-auto rounded-lg" />
            </div>
        </Modal>
    );
};

export default ImageModal;
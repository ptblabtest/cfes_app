import React from 'react';
import Modal from '../Modal';
import FormCard from '../Content/FormCard';


const FormModal = ({ show, onClose, entity, item, fields, title }) => {

    const currentPath = window.location.pathname;

    return (
        <Modal show={show} onClose={onClose} maxWidth="2xl">
            <div className="p-6">
                <h3 className="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">{title}</h3>
                <div className="mt-4">
                <FormCard
                        entity={entity} 
                        item={item} 
                        fields={fields} 
                        currentPath={currentPath} 
                    />
                </div>
            </div>
        </Modal>
    );
};

export default FormModal;

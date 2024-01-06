import React, { useEffect, useRef, useState } from 'react';
import 'ol/ol.css';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import { fromLonLat } from 'ol/proj';
import VectorLayer from 'ol/layer/Vector';
import VectorSource from 'ol/source/Vector';
import Point from 'ol/geom/Point';
import Feature from 'ol/Feature';
import { Style, Fill, Stroke, RegularShape, Icon } from 'ol/style';
import { ItemDetailsModal } from '../Modal/Modal';


const MapComponent = ({ items, fields }) => {
    const mapRef = useRef();
    const [selectedItem, setSelectedItem] = useState(null);
    const [isModalOpen, setIsModalOpen] = useState(false);

    useEffect(() => {
        const map = new Map({
            target: mapRef.current,
            layers: [
                new TileLayer({
                    source: new OSM()
                })
            ],
            view: new View({
                center: fromLonLat([113.9213, -0.7893]), // Center on Indonesia
                zoom: 5
            })
        });

        const vectorLayer = new VectorLayer({
            source: new VectorSource(),
            style: function(feature, resolution) {
                return new Style({
                    image: new RegularShape({
                        fill: new Fill({ color: 'red' }), // Pinpoint head color
                        stroke: new Stroke({ color: 'white', width: 1 }), // Border of the head
                        points: 3, // Creates a triangle
                        radius: 20, // Size of the head
                        radius2: 4, // Size of the pointed tail
                        angle: Math.PI // Rotate to point downwards
                    })
                });
            }
        });

        map.on('pointermove', function(e) {
            const pixel = map.getEventPixel(e.originalEvent);
            const hit = map.hasFeatureAtPixel(pixel);
            map.getTargetElement().style.cursor = hit ? 'pointer' : '';
        });

        map.on('singleclick', function (evt) {
            map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                setSelectedItem(feature.get('item'));
                setIsModalOpen(true);
                map.getView().animate({ zoom: 10, center: feature.getGeometry().getCoordinates() });
            });
        });
        
        map.addLayer(vectorLayer);

        items.forEach(item => {
            const latitude = parseFloat(item.x_coordinate);
            const longitude = parseFloat(item.y_coordinate);

            if (!isNaN(latitude) && !isNaN(longitude)) {
                const point = new Feature({
                    geometry: new Point(fromLonLat([longitude, latitude])),
                    item: item // Attach the item to the feature for access on click
                });

                vectorLayer.getSource().addFeature(point);
            }
        });

        map.on('singleclick', function (evt) {
            map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                setSelectedItem(feature.get('item'));
                setIsModalOpen(true);
            });
        });

    }, [items]);

    return (
        <div className="max-w-7xl mt-2 mx-auto sm:px-6 lg:px-8">
                <div className="p-6">
                    <div ref={mapRef} className="h-96" />
                    {isModalOpen && (
                        <ItemDetailsModal
                            item={selectedItem}
                            fields={fields}
                            onClose={() => setIsModalOpen(false)}
                        />
                    )}
                </div>
            </div>

    );

};

export default MapComponent;
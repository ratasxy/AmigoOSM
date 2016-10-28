FROM ubuntu:14.04

MAINTAINER Juan Salas "juan@amigocloud.com"

LABEL description="A base container for OSM docker"

ENV DEBIAN_FRONTEND noninteractive

# setting locale
RUN locale-gen en_US.UTF-8
ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

RUN apt-get update -q && apt-get install -y \
	wget make python \
	build-essential \
	python2.7-dev \
	pkg-config \
	libfreetype6-dev \
	zlib1g-dev \
	libpng12-dev \
	libxml2-dev \
	libicu-dev \
	libjpeg-dev \
	libproj-dev \
	libtiff5-dev \
	libboost-dev \
	libboost-python-dev \
	libboost-system-dev \
	libboost-filesystem-dev \
	libboost-regex-dev \
	libboost-thread-dev \
	libboost-program-options-dev \
	python-mapnik \
    git make cmake g++ \
    libexpat1-dev zlib1g-dev \
    libbz2-dev libpq-dev libgeos-dev libgeos++-dev lua5.2 \
    liblua5.2-dev curl unzip

## osm2pgsql
## ============================================================================
WORKDIR /root/downloads/osm2pgsql
RUN git clone git://github.com/openstreetmap/osm2pgsql.git ../osm2pgsql
WORKDIR /root/downloads/osm2pgsql/build
RUN cmake .. && \
    make && make install && \
    rm -rf /root/downloads/osm2pgsql

WORKDIR /root/downloads
RUN curl -O -L https://bootstrap.pypa.io/get-pip.py && python get-pip.py && \
     pip install -U modestmaps simplejson werkzeug tilestache

WORKDIR /srv/osm/
RUN git clone https://github.com/openstreetmap/mapnik-stylesheets . && ./get-coastlines.sh
COPY ./tilestache-server.py .
COPY ./tilestache.conf .
COPY ./style.xml .

EXPOSE 8080

COPY ./entrypoint.sh /
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
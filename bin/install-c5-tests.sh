#!/usr/bin/env bash

if [ $# -lt 3 ]; then
	echo "usage: $0 <db-name> <db-user> <db-pass> [db-host] [c5-version]"
	exit 1
fi

DB_NAME=$1
DB_USER=$2
DB_PASS=$3
DB_HOST=${4-localhost}
C5_VERSION=${5-master}


C5_CORE_DIR="/tmp/concrete5/"
# PACKAGE_NAME=$(readlink -f "$(dirname %0)" | sed 's,^\(.*/\)\?\([^/]*\),\2,')
PACKAGE_NAME="social_share_privacy"
echo "Package Name is: "$PACKAGE_NAME

set -ex

install_c5() {
	rm -rf $C5_CORE_DIR
	mkdir -p $C5_CORE_DIR

	if [ $C5_VERSION == 'latest' ]; then 
		local ARCHIVE_NAME='master'
	else
		local ARCHIVE_NAME="$C5_VERSION"
	fi

	wget -nv -O /tmp/concrete5.tar.gz https://github.com/concrete5/concrete5/archive/${ARCHIVE_NAME}.tar.gz
	tar --strip-components=1 -zxmf /tmp/concrete5.tar.gz -C $C5_CORE_DIR
	
	# echo 'short_open_tag = On' >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
        
	# Install Package
    mkdir "${C5_CORE_DIR}web/packages/${PACKAGE_NAME}"
    cp -r "`dirname $0`/.." "${C5_CORE_DIR}web/packages/${PACKAGE_NAME}/"
    
	# Install Package Tests
    mkdir -p "${C5_CORE_DIR}tests/tests/packages/${PACKAGE_NAME}/"
    cp -r `dirname $0`/../tests/* "${C5_CORE_DIR}tests/tests/packages/${PACKAGE_NAME}/"
	
	# Modify Starting Point to make it install this package
	sed -i.bak "s/<\/concrete5-cif>/\<packages\>\<package handle=\"${PACKAGE_NAME}\"\/\>\<\/packages\>\<\/concrete5-cif\>/g" "${C5_CORE_DIR}web/concrete/config/install/packages/standard/content.xml"
	
	mysql -u ${DB_USER} --password="${DB_PASS}" -e "DROP DATABASE IF EXISTS \`${DB_NAME}\`;"
	mysql -u ${DB_USER} --password="${DB_PASS}" -e "CREATE DATABASE \`${DB_NAME}\`;"
	
    ${C5_CORE_DIR}cli/install-concrete5.php --db-server=${DB_HOST} --db-username=${DB_USER} --db-password="${DB_PASS}" --db-database=${DB_NAME} --admin-email=webmaster@example.org --admin-password=password --target=${C5_CORE_DIR}web --starting-point=standard
}

install_c5

# Creation base de données QCV - Pierre Jarillon - 25-07-2005

DIRPROG=/home/pierre/QCV

cd $DIRPROG

# refaire grantQCV.sql si la table a été modifiée
if [ tablesQCV.sql -nt  grantQCV.sql ]
then
	sh makeGrant >  grantQCV.sql
fi

dropdb qcv
createdb qcv
# createlang plpgsql qcv


dropdb qcv
sleep 1
createdb qcv && \
psql qcv -f $DIRPROG/tablesQCV.sql && \
psql qcv -f $DIRPROG/grantQCV.sql && \
psql qcv -f $DIRPROG/initdb.sql && \

